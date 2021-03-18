ActiveAdmin.register User do

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
    column :region
    column :status
    column :career do |user|
      "#{user.career}년차"
    end
    column :detail_list
    actions
  end

  filter :name
  filter :email
  filter :region, as: :select, collection: User.regions
  filter :role, as: :select, collection: User.roles
  filter :career

  scope :all, default: true
  scope -> { "표시안함" }, :no_status_status
  scope -> { "구직중" }, :job_searching_status
  scope -> { "구인중" }, :job_offering_status
  scope -> { "재직중" }, :in_office_status

  show do
    ## 테이블 형태로 출력
    attributes_table do
      row :id
      row :profile do |user|
        if user.profile.attached?
          image_tag url_for(user.profile), class: "small_image"
        end
      end
      row :name
      row :email
      row :region
      row :status
      row :career
      row :detail_list
    end
  end
end
