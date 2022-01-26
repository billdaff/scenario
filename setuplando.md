Install PHP 8 and (atleast) the following extensions:

```
sudo add-apt-repository ppa:ondrej/php
sudo apt update
sudo apt install php8.0 libapache2-mod-php8.0 php8.0-mbstring php8.0-xml php8.0-gd
```

Hyperdrive:
https://github.com/lando/hyperdrive/tree/v0.6.1
```
curl -Ls https://github.com/lando/hyperdrive/releases/download/v0.6.1/hyperdrive > /tmp/hyperdrive \
  && chmod +x /tmp/hyperdrive \
  && /tmp/hyperdrive
```

Install docker composer v1.29.2 (any higher breaks the container naming and doesnt create db correctly), make executable, and symlink to lando
```
sudo curl -L "https://github.com/docker/compose/releases/download/1.29.2/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
sudo chmod +x /usr/local/bin/docker-compose

```

add to end of .bashrc add:
```
export LANDO_SSH_AUTH_SOCK="${SSH_AUTH_SOCK}"
```

In wsl2 SSH_AUTH_SOCK is randomly generated and not set, add this before the above entry in your .bashrc:
```
if [ -z "$SSH_AUTH_SOCK" ] ; then
    eval `ssh-agent -s`
    ssh-add
fi
export LANDO_SSH_AUTH_SOCK="${SSH_AUTH_SOCK}"
```
Then logout/login or 
```
source ~/.bashrc
```
Run the follow to test if it worked:
```
echo $SSH_AUTH_SOCK
```
should get something like
```
/tmp/ssh-pu3wNOPC9r5G/agent.25424
```
Then run ...