#!/usr/bin/perl

use strict;
use warnings;
use MongoDB;
use Data::Dumper;

my $hostname = "localhost";
my $port = 27017;

my $conn = MongoDB::Connection->new( "host" => "$hostname", 
                                     "port" => $port );
# Database name is it350
my $db = $conn->it350;
# Collection name is computers
my $user_stats = $db->computers;

# Insert line
$user_stats->insert({'hostname' => "kawe", 
                     'CPU'=> 12, 
                     'RAM' => 13, 
                     'users' => "tbenz9", } );

my $myStr = $user_stats->find_one();
#print Dumper($myStr);
