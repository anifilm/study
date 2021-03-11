# Modules

# 모듈은 메서드의 컬렉션이라고 할 수 있다. 특정 상수와 메서드가 필요할 때에 모듈을
# 사용할 수 있다. 모듈은 메서드와 상수를 namespace로 분리하는 역할을 한다.

# module은 class와 유사해 보이지만, 모듈에는 인스턴스를 만들 수 없으며, 하위 클래스
# 또한 만들 수 없다.

# 모듈 정의하기
module ModuleName
    CONSTANT_NAME = "Constant value"
end

# 루비의 기본 내장 모듈 사용하기
ModuleName::CONSTANT_NAME

# 예시 - Math Module
puts Math::PI # 3.141592...

# 모듈에 싱클톤 메서드 정의 모듈에 self를 붙여서 정의한 메서드
module Food
    # singletin method
    def self.taste
        %w(cherry-tart custard pine-apple).sample
    end

    # 다른 모듈이나 클래스 정의
    module Cookie
    end

    class Mushroom
    end
end

# 싱글톤 메서드 사용하기
Food.taste

# 네임스페이스로 사용하기
Food::Cookie
Food::Mushroom


# 클래스나 모듈 읽기
require 'my_module'

# 예시
# date Module
require 'date'
puts Date.today # 2017-07-06

# 외부 파일에 정의된 모듈 불러오기
require './library' # 실행 디렉터리의 library.rb 불러옴
require 'library'   # $LOAD_PATH에서 libaray.rb 불러옴


# module function

# 모듈 함수란 private 인스턴스 메서드이면서 모듈의 싱글톤 메서드인 메서드로,
# 서브 루틴으로 이용할 목적인 메서드는 모듈 함수로 정의할 수 있다.

# 모듈 함수 정의하기
module MyModule
    module_function
    def my_module_func
        puts "module function"
    end
end
