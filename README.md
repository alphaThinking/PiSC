# PiSC
## Requirements
### Prerequirements
* Raspberry Pi with internet connection and working OS (Raspbian recommended)
* Installation of the PiSC app from the Play Store

### Additional hardware
* 433/434 MHz radio sockets (e.g. [these](http://www.amazon.de/Elro-AB440S-3C-Funksteckdosen-Funksteckdose/dp/B002QXN7X6), German)
* 433/434 MHz radio module (e.g. [this](http://www.watterott.com/en/RF-Link-Transmitter-434MHz))
* Some jumper cables (e.g. [these](http://www.reichelt.com/?ARTICLE=139521) (breadboard required))

## Wiring
Connect the pins of the Pi to these of your radio module (GND, VCC, DATA). Please look inside your modules datasheet and a Pi pin overview (e.g. [this](http://jeffskinnerbox.wordpress.com/2012/12/05/raspberry-pi-serial-communication/raspberry-pi-rev-1-gpio-pin-out-2) picture). Mostly the datapin of the radio module should be connected to GPIO #17 on your Raspberry.

## Software installation
If you have not done this already, you must set up a webserver with PHP now, for example Apache:

`sudo apt-get install apache2 php5 libapache2-mod-php5`

Now you must install [WiringPi](https://github.com/WiringPi/WiringPi) and [rcswitch-pi](https://github.com/r10r/rcswitch-pi). The clone path of WiringPi is not important, simply compile (`make`) and install (`sudo make install`) it. The compiled (`make`) files of rcswitch-pi should be copied to `/var/www`.

Then browse to `/var/www` and clone this project from GitHub:

`git clone https://github.com/alphaThinking/PiSC.git`

If you want, copy all files out of the new folder to the main directory or copy the rcswitch-pi files in the PiSC directory. Important is, that the app-remote(.conf).php and the send file are in the same folder.

Now edit the sudoers file to give the script access to the send command:

`sudo nano /etc/sudoers`

Of course you can use any other editor. Now add the following text to the last line (if your script is not in /var/www, you must correct the path):

`www-data ALL=NOPASSWD:/var/www/send`

I recommend to change the right of the send file, otherwise all "normal" users are able to replace this file and let execute their commands by www-data with sudo rights.

## App setup
First you must go to the settings and add your server. If you want to use the sockets in your local network only, this is the ip address of the Pi which can be found out by the command `ifconfig`. If the script file is in a subdirectory, you must add this to the server path, for example the address is `192.168.178.50/sockets` then. With a redirection on your router and a DynDNS service you can get worldwide access.

## Setting a password
If you want to set a password, first edit the app-remote.conf.php on your Pi. Then add the password to the app settings. If the wrong password is setted, nothing will happen.

## Disclaimer
* Im am not responsible for any links on this site.
* No warranty for damages caused by this manual or the app/script.