class AddNameInUser < ActiveRecord::Migration
  def up
  	add_column :users, :name, :string
  end

  def down
  end
end
