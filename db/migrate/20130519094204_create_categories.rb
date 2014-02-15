class CreateCategories < ActiveRecord::Migration
  def change
    create_table :categories do |t|
      t.string :name
      t.integer :parent_category_id
      t.integer :photo_file_size
      t.string :photo_content_type
      t.string :photo_file_name

      t.timestamps
    end
  end
end
