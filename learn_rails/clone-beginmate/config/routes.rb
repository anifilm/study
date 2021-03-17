Rails.application.routes.draw do
  get 'users/show'
  get 'users/index'
  resources :teams, except: [:index]
  resources :users, only: [:index, :show]
  #get "users/:id" => "users#show" 생성
  devise_for :users

  root "home#index"
  devise_for :admin_users, ActiveAdmin::Devise.config
  ActiveAdmin.routes(self)
  # For details on the DSL available within this file, see https://guides.rubyonrails.org/routing.html
end
