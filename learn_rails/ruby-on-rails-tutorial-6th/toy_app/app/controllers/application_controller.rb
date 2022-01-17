class ApplicationController < ActionController::Base
  def hello
    render html: "Hello Rails!"
  end
end
