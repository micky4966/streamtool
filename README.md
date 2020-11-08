# streamtool
## Features:
- Streaming and restreaming (authentication, m3u8)
- Manage users (overview, add, edit, delete, enable, disable)
- Manage categories (overview, add, edit, delete)
- Manage streams (overview, add, edit, delete,start,stop)
- Manage settings (configuration)
- Autorestart (every minute)
- Transcode
- Last IP connected
- h264_mp4toannexb
- play stream
- Playlist import
- Multiple streams on one channel
- Limit streams on users
- IP Block
- User Agent block
- predefined transcode profiles


## Installation
1. **`SUPPORTED DISTRIBUTION : Ubuntu 20.04 64 BIT`**
2. **`curl -s https://raw.githubusercontent.com/NeySlim/streamtool/master/install/ubuntu20 | bash`**
3. **`Visit : http://your-ip:9001/ login with User : admin Password : admin`**
4. **`Change "Web ip: *" with your public IPv4 server ip at http://your-ip:9001/settings.php`**
5. **`Mysql Password : cat /root/MYSQL_ROOT_PASSWORD`**


### Change port of panel
1. change port in webinterface -> Settings -> web Port
2. change port in /opt/streamtool/app/nginx/conf/nginx.conf -> listen 8000;
3. `killall nginx; killall nginx_streamtool`
4. `/opt/streamtool/app/nginx/sbin/nginx`

## How can I use it?
- Default login: admin / admin
  - Add user
  - Add stream and use defined transcode profile 1 called **Default 1**
- You can use it also in proxy mode, but that depends on how you want to use it.
- The most stable way is using transcode profile: **Default 1** without proxy mode ticket

## Sources
1. Streamtool-v1
2. nginx

