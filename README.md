# time-tinkerer

You can use it this script to quickly warp the time of a machine when you need to debug time-related issues (like me right now...)

## Usage

To get this script working you need to be root or be able to run `sudo date` without a password

    # git clone https://github.com/beeman/time-tinkerer.git
    # cd time-tinkerer
    # php -S 0.0.0.0:8000
    
Now visit the webpage running on port 8000 and click one of the dates. The server time should now change to that date.

If this does not work or time keeps returning to the real time ([whatever that is](http://www.npr.org/2014/11/03/361069820/new-clock-may-end-time-as-we-know-it)) you can try to disable NTP, VMware tools, VirtualBox Guest Additions and the like. If that does not help: good luck ;)