![Streamtool](https://github.com/NeySlim/streamtool/raw/master/app/www/img/streamtool.png "Streamtool")

A web software for managing and manipulating video streams.

## Features:
- Streaming and restreaming
- Manage users
- Manage stream categories
- Manage streams 
- Transcode streams with advanced configuration
- Manage transcode profiles
- NVENC full hardware transcoding (decoding/encoding) support for H264/HEVC
- Autorestart on stream failure
- Playlist generation
- Bulk import
- User Agent manager
- IP filter manager
- Resources monitor
... and more to come
 
## Installation
 **SUPPORTED DISTRIBUTION : Ubuntu 20.04 64 BIT**
  As administrator execute:
```bash
curl -s https://raw.githubusercontent.com/NeySlim/streamtool/master/install/st-11.20.sh | sudo bash
```
  Visit : http://streamtool-adress:9001/ login with 
 Default Username Password: admin



### Change streaming port
1. change port in webinterface -> Settings -> web Port
2. Execute **systemctl restart streamtool-webserver**

## How does it work ?
- Default login: admin / admin
  - Add a category to allow user and stream creation
  - Add a stream or import a playlist
  - Add a user
- Not using transcoding will only remux stream to simple hls output.
- vaapi soon to be implemented


