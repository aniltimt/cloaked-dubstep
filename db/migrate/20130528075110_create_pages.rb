class CreatePages < ActiveRecord::Migration
  def change
    create_table :pages do |t|
      t.string :page_heading
      t.text :content

      t.timestamps
    end
  end
end
