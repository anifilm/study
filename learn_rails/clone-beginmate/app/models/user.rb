class User < ApplicationRecord
  # Include default devise modules. Others available are:
  # :confirmable, :lockable, :timeoutable, :trackable and :omniauthable
  devise :database_authenticatable, :registerable,
         :recoverable, :rememberable, :validatable

  has_one_attached :profile

  enum status: ["no_status", "job_searching", "job_offering", "in_office"]

  has_many :teams, dependent: :destroy
end
