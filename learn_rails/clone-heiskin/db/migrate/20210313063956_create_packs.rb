class CreatePacks < ActiveRecord::Migration[6.1]
  def change
    create_table :packs do |t|
      t.string :image
      t.string :product_name
      t.string :company_name
      t.text :desc

      t.timestamps
    end
  end
end
