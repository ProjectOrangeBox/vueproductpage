#!/bin/bash

source "$(cd `dirname $0` && pwd)/shelly.sh"

# load config file
source $CONFIGFILE

runAsRoot

# check if owner is valid user
ownerExists $OWNER
println "Owner $OWNER"

# check if group is valid group
groupExists $GROUP
println "Group $GROUP"

# start

safeMakeDirectory /var
safeMakeDirectory /var/cache
safeMakeDirectory /var/cache2
safeMakeDirectory /var/downloads
safeMakeDirectory /var/emails
safeMakeDirectory /var/fork_output
safeMakeDirectory /var/gulp
safeMakeDirectory /var/isql
safeMakeDirectory /var/logs
safeMakeDirectory /var/sessions
safeMakeDirectory /var/tmp
safeMakeDirectory /var/uploads
safeMakeDirectory /var/views
safeMakeDirectory /var/xdebug

safeMakeDirectory /support
safeMakeDirectory /support/keys
safeMakeDirectory /support/migrations

println "Changing Directory Mode to 775."
find $ROOT -type d -exec chmod 775 {} \;

println "Changing Files Mode to 664."
find $ROOT -type f -exec chmod 664 {} \;

println "Changing Owner to $OWNER."
find $ROOT -type d -exec chown $OWNER {} \;
find $ROOT -type f -exec chown $OWNER {} \;

println "Changing Group to $GROUP."
find $ROOT -type d -exec chgrp $GROUP {} \;
find $ROOT -type f -exec chgrp $GROUP {} \;

# Read / Write directory
println "Adjust $ROOT/var directory to make Read/Writable."
find "$ROOT/var/" -type d -exec chmod 777 {} \;
find "$ROOT/var/" -type f -exec chmod 666 {} \;

# bin shell stuff
println "Adjust bin Scripts to make executable."
find "$ROOT/bin/" -type f -iname "*.sh" -exec chmod 777 {} \;
