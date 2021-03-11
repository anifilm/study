Rails.application.routes.draw do
  root "hello#index"
  # For details on the DSL available within this file, see https://guides.rubyonrails.org/routing.html
  get "/hello", to: "hello#index"
  get "/hello/view", to: "hello#view"
  get "/hello/list", to: "hello#list"
end

# 6.1.3 메뉴얼에서
# root "hello#index"
# get "/hello", to: "hello#index"

# 3.0 메뉴얼에서
# root :to => "home#index"
