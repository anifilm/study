class AddColsToUsers < ActiveRecord::Migration[6.1]
  def change
    add_column :users, :region, :integer, default: 0
    add_column :users, :role, :integer, default: 0
    add_column :users, :career, :integer, default: 0
  end
end
