class HelloController < ApplicationController
    def index
        render text: 'Hello World..!'
    end

    def view
        @msg = 'Hello World..!'
    end

    def list
        @books = Book.all
    end

    def app_var
        render text: MY_APP['logo']['source']
    end

    def validate_each(recode, arrtibute, value)
        # TODO: 무언가를 구현하주세요.
    end
end
