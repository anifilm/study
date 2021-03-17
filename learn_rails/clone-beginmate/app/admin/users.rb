ActiveAdmin.register User do

  scope :all, default: true
  scope -> { "표시안함" }, :no_status_status
  scope -> { "구직중" }, :job_searching_status
  scope -> { "구인중" }, :job_offering_status
  scope -> { "재직중" }, :in_office_status

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
    column :detail_list
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
      row :detail_list
    end
  end
end
