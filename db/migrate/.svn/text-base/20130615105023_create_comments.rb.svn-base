class CreateComments < ActiveRecord::Migration
  def change
    create_table :comments do |t|
      t.integer :user_id
      t.integer :pin_id
      t.text :user_comment

      t.timestamps
    end
  end
end
