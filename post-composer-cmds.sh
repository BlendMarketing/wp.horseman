#!/bin/bash

#################################### 
# Clear out themes and plugins directory 
#################################### 
rm -rf public/wp-content/plugins

#################################### 
# Create themes and plugins directory
#################################### 
mkdir -p public/wp-content/plugins


ln -sf ../wp-vendor/wordpress/ public/wordpress 

#################################### 
# Symlink Plugins
#################################### 
PLUGINS=wp-vendor/plugins/*
for p in $PLUGINS
do
    PLUGIN=$(basename "$p")
    echo "Processing $PLUGIN plugin..."
    ln -sf ../../../wp-vendor/plugins/$PLUGIN/ public/wp-content/plugins/$PLUGIN
done
echo "Done processing vendor plugins." 
PLUGINS=plugins/*
for p in $PLUGINS
do
    PLUGIN=$(basename "$p")
    echo "Processing $PLUGIN plugin..."
    ln -sf ../../../plugins/$PLUGIN/ public/wp-content/plugins/$PLUGIN
done
echo "Done processing user plugins." 
