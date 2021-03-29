require "application_system_test_case"

class FanCommentsTest < ApplicationSystemTestCase
  setup do
    @fan_comment = fan_comments(:one)
  end

  test "visiting the index" do
    visit fan_comments_url
    assert_selector "h1", text: "Fan Comments"
  end

  test "creating a Fan comment" do
    visit fan_comments_url
    click_on "New Fan Comment"

    fill_in "Author no", with: @fan_comment.author_no
    fill_in "Body", with: @fan_comment.body
    check "Deleted" if @fan_comment.deleted
    fill_in "Name", with: @fan_comment.name
    click_on "Create Fan comment"

    assert_text "Fan comment was successfully created"
    click_on "Back"
  end

  test "updating a Fan comment" do
    visit fan_comments_url
    click_on "Edit", match: :first

    fill_in "Author no", with: @fan_comment.author_no
    fill_in "Body", with: @fan_comment.body
    check "Deleted" if @fan_comment.deleted
    fill_in "Name", with: @fan_comment.name
    click_on "Update Fan comment"

    assert_text "Fan comment was successfully updated"
    click_on "Back"
  end

  test "destroying a Fan comment" do
    visit fan_comments_url
    page.accept_confirm do
      click_on "Destroy", match: :first
    end

    assert_text "Fan comment was successfully destroyed"
  end
end
