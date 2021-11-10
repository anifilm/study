우분투 ruby 설치 준비

$ sudo apt-get update

$ sudo apt-get install git-core curl zlib1g-dev build-essential libssl-dev libreadline-dev libyaml-dev libsqlite3-dev sqlite3 libxml2-dev libxslt1-dev libcurl4-openssl-dev libffi-dev nodejs


rbenv 가상환경을 이용해 ruby 설치하기

# rbenv 설치하기

$ git clone https://github.com/rbenv/rbenv.git ~/.rbenv

$ echo 'export PATH="$HOME/.rbenv/bin:$PATH"' >> ~/.zshrc

$ echo 'eval "$(rbenv init -)"' >> ~/.zshrc

$ exec $SHELL


# ruby-build 설치하기

$ git clone https://github.com/rbenv/ruby-build.git ~/.rbenv/plugins/ruby-build

$ echo 'export PATH="$HOME/.rbenv/plugins/ruby-build/bin:$PATH"' >> ~/.zshrc

$ exec $SHELL


# rbenv로 ruby 설치 가능 버전 확인

$ rbenv install -l


# rbenv로 ruby 설치하기

$ rbenv install 2.7.4
$ rbenv global 2.7.4
$ rbenv rehash


# bundler 설치하기 (bash zsh alias 설정으로 버전 지정 가능 / bundler, bundle)

$ gem install bundler -v 1.17.3
$ rbenv rehash


# rails 설치하기

$ gem install rails -v 4.2.11
