class User < ApplicationRecord
  has_many :microposts
  validates :user, presence: true
  validates :email, presence: true
end
