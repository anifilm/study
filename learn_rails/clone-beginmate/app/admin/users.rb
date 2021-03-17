ActiveAdmin.register User do

  scope :all, default: true
  scope :no_status
  scope :job_searching
  scope :job_offering
  scope :in_office

  index do
    selectable_column
    id_column
    column :profile do |user|
      if user.profile.attached?
        image_tag url_for(user.profile), class: "small_image"
      end
    end
    column :name
    column :email
    column :status

    actions
  end

  filter :name
  filter :email

  show do
    ## 테이블 형태로 출력
    arrtibutes_table do
      row :id
      row :profile do |user|
        if user.profile.attached?
          image_tag url_for(user.profile), class: "small_image"
        end
      end
      row :name
      row :email
      row :status
    end
  end
end
