# 메서드 정의

def hello(names)
  names.each do |name|
    puts "HELLO, #{name.upcase}"
  end
end

rubies = ['MRI', 'jruby', 'rubinius']

hello(rubies) # "HELLO, MRI"
              # "HELLO, JRUBY"
              # "HELLO, RUBINIUS" 출력
