#!/usr/bin/perl

# use module
use XML::LibXML;
use Net::FTP;
use Net::NTP;
use File::Find;

$utente="p1mps";
$password="birba100";
$server="p1mps.altervista.org";
$fileblog="data/blog.xml";

print "What to do?\n";
print "1) blog\n";
print "2) about\n";
print "3) projects\n";
print "4) uploadALL\n";
$number =<>;

SWITCH: {
    $number == 1 && do {
	blog();
	break;
    };
    $number == 2 && do {
	projects();
	break;
	
    };
    $number == 3 && do {
	about();
	break;
	
    };
    $number == 4 && do {
	#$ftpp = ftp;
	&all;
	
	
	break;
	
    };
    
}

# Accepts one argument: the full path to a directory.
# Returns: A list of files that reside in that path.
sub process_files {
	
}


sub all{
            
    find(\&wanted,  ".");
}


sub wanted{
    
     
    $ftp = Net::FTP->new($server, Debug => 0)
	or die "Cannot connect to some.host.name: $@";
    
    $ftp->login($utente,$password)
	or die "Cannot login ", $ftp->message;

    if($_ !~ m/~/){

    
    if( -d $_){
	$ftp->mkdir($_);
       
    }
    else{
	$ftp->cwd($File::Find::dir);
	print "uploading ",$_,"\n";  
	$ftp->put($_);
    }
    
    $ftp->quit;
    }
    
}


sub blog(){
   
    print "Insert Title\n";
    $title=<>;
    print "Insert Post\n";
    $post=<>;
    my $xmlParser = XML::LibXML->new();
    my $xmlDoc 	= $xmlParser->parse_file($fileblog);
    my $root	= $xmlDoc->getDocumentElement;
    my @posts= $root->getElementsByTagName('post');
    my $post_new = $xmlDoc->createElement('post');
    my $content = $xmlDoc->createElement('content');
    my $titolo = $xmlDoc->createElement("title");
    my $content = $xmlDoc->createElement("content");
    my $date = $xmlDoc->createElement("date");
    $content->appendText($post);
    $titolo->appendText($title);
    $now_string = localtime;
    $date->appendText($now_string);
    $post_new->appendChild($titolo);
    $post_new->appendChild($content);
    $post_new->appendChild($date);
    @ele=$xmlDoc->findnodes('response');
    $ele[0]->insertBefore($post_new,$root->firstChild);
    $xmlDoc->toFile($fileblog,0);
    $ftp = Net::FTP->new($server, Debug => 0)
	or die "Cannot connect to some.host.name: $@";
    
    $ftp->login($utente,$password)
	or die "Cannot login ", $ftp->message;
    $ftp->cwd("/data")
      or die "Cannot change working directory ", $ftp->message;
    $ftp->put($fileblog);
    $ftp->quit;
}


sub projects(){

}

sub about(){


}

#read title

#ncftpput -u $utente -p $passowrd $server data/  $file

