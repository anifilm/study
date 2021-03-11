class HelloController < ApplicationController
  def index
    @msg = 'Hello, Rails! Hotload test...'
  end
  def view
    render 'hello/special' # TODO: render에 대해서 더 알아보자
  end
  def list
    @books = Book.all
  end
end
