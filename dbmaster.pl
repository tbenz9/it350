#!/usr/bin/perl

#BEGIN
#{
#  unless (eval "use DBI; 1")
#  {
#    print "Missing DBI. Installing...\n";
$version=`cat /etc/issue.net`;
if ( $version =~ /Ubuntu/ ) {
    print `apt-get install libdbd-mysql-perl`;
}
else
{
    print `yum -y install perl-DBI perl-DBD-MySQL 2>&1`;
}
    die "Can't load DBI: $@" unless eval "use DBI; 1";
#  }
#}

@months = qw(Jan Feb Mar Apr May Jun Jul Aug Sep Oct Nov Dec);
@weekDays = qw(Sun Mon Tue Wed Thu Fri Sat Sun);
($second, $minute, $hour, $dayOfMonth, $month, $yearOffset, $dayOfWeek, $dayOfYear, $daylightSavings) = localtime();
 $year = 1900 + $yearOffset;
 $theTime = "$weekDays[$dayOfWeek] $months[$month] $dayOfMonth $year, $hour:$minute:$second";

# CONFIG VARIABLES
$platform = "mysql";
$database = "it350";
$host = "localhost";
$port = "";
$tablename = "computers";
$user = "root";
$pw = "cookies123";

# DATA SOURCE NAME
$dsn = "DBI:$platform:$database:$host:$port";

#RAM Info
my @memo = `dmidecode | grep "Memory Module Information"`;
my $membanks=@memo;
my $mem = `free -m | grep Mem`;
$mem =~ m/Mem:\s*([0-9]*)/;
$RAM = $1;
$Name =  `hostname`;
#$IP = `ifconfig | grep 'inet addr:' | grep -v '127.0.0.1' | cut -d: -f2 | awk '{ print \$1}'`;
#$MAC = `ifconfig | grep -o -E '([[:xdigit:]]{1,2}:){5}[[:xdigit:]]{1,2}'`;
#$HDD = `fdisk -l /dev/sda | grep Disk | grep sda | cut -d: -f2 | awk '{ print \$1}'`;
#$Graphics = `lspci | grep VGA`;
$OS = `cat /etc/issue.net`;
$CPU = `cat /proc/cpuinfo  | grep model | cut -d: -f2`;
#$CPU = `cat /proc/cpuinfo  | grep model | cut -d: -f2 | awk '{ print \$2 \$3 " " \$4 \$5 \$6}'`;
#$cpu_MHz = `cat /proc/cpuinfo | grep MHz | cut -d: -f2`;

=pod
if ($Graphics =~ m/Intel/i) {$Graphics = "Intel Graphics";}
if ($Graphics =~ m/VirtualBox/i) {$Graphics = "VirtualBox"; $Model = "VM";}
if ($Graphics =~ m/GeForce 210/i) {$Graphics = "GeForce 210";}
if ($Graphics =~ m/G200eW/i) {$Graphics = "Matrox onboard G200eW";}
if ($Graphics =~ m/ASPEED/i) {$Graphics = "ASPEED onboard";}
if ($Graphics =~ m/8400/i) {$Graphics = "Nvidia GeForce 8400";}
if ($Graphics =~ m/6150/i) {$Graphics = "Nvidia GeForce 6150";}
=cut

if ($CPU =~ m/6274/i) {$CPU = "Opteron 6274 2.2GHz"; $cores = "16"; $arch = "x86_64"; $vt = "Y";}
if ($CPU =~ m/E31220/i) {$CPU = "Xeon E31220 3.1Ghz"; $cores = "4"; $arch = "x86_64"; $vt = "Y";}
if ($CPU =~ m/i7-2600K/i) {$CPU = "i7-2600K 3.4GHz"; $cores = "4"; $arch = "x86_64"; $vt = "Y";}
if ($CPU =~ m/6128/i) {$CPU = "Opteron 6128 2.0GHz"; $cores = "8"; $arch = "x86_64"; $vt = "Y";}
if ($CPU =~ m/D CPU 2.80GHz/i) {$CPU = "Pentium D 2.8GHz"; $cores = "2"; $arch = "x86_64"; $vt = "N";}
if ($CPU =~ m/E6550/i) {$CPU = "Core 2 Duo E6550 2.0GHz"; $cores = "2"; $arch = "x86_64"; $vt = "Y";}
if ($CPU =~ m/Pentium(R) 4/i) {$CPU = "Pentium 4 1.6GHz"; $cores = "1"; $arch = "x86"; $vt = "N";}
if ($CPU =~ m/1100T/i) {$CPU = "Phenom II 1100T 3.3GHz"; $cores = "6"; $arch = "x86_64"; $vt = "Y";}
if ($CPU =~ m/i3 CPU 540/i) {$CPU = "i3 540 3.07GHz"; $cores = "4"; $arch = "x86_64"; $vt = "Y";}
if ($CPU =~ m/4000+/i) {$CPU = "Athlon 64 X2 4000+ 2.1GHz"; $cores = "2"; $arch = "x86_64"; $vt = "N";}
if ($CPU =~ m/6100/i) {$CPU = "Phenom II 6100 3.3GHz"; $cores = "6"; $arch = "x86_64"; $vt = "Y";}

if ($OS =~ m/6.2/i) {$OS = "CentOS 6.2";}
if ($OS =~ m/5.8/i) {$OS = "CentOS 5.8";}

# PERL DBI CONNECT
$connect = DBI->connect($dsn, $user, $pw);

# PREPARE THE QUERY
$query = "INSERT INTO $tablename (computers_ID,hostname,ram,operating_system,motherboard) VALUES ('C_1885','$Name','$RAM','$OS','$CPU')";
$query_handle = $connect->prepare($query);

# EXECUTE THE QUERY
$query_handle->execute();
