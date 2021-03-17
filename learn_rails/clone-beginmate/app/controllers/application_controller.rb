class ApplicationController < ActionController::Base
  before_action :configure_permitted_parameters, if: :devise_controller?

  protected
    def configure_permitted_parameters
      devise_parameter_sanitizer.permit(:sign_up, keys: [:name, :profile, :status])
      devise_parameter_sanitizer.permit(:account_update, keys: [:name, :profile, :status, :region, :role, :career, :detail_list])
    end
end
