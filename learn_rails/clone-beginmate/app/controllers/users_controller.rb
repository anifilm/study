class UsersController < ApplicationController
  def index
    @users = User.all
    if params[:region].present?
      @users = @users.where(region: params[:region])
    end
    if params[:role].present?
      @users = @users.where(role: params[:role])
    end
    if params[:career].present?
      @users = @users.where(career: params[:career])
    end
    if params[:status].present?
      @users = @users.where(status: params[:status])
    end
  end

  def show
    @user = User.find(params[:id])
  end
end
