require 'rubygems'
require 'to_google_spreadsheet'
require 'ostruct'

teachers =[]

 	File.open("/var/www/html/edufolium.com/intl/mod/edujobs/usuarios.txt") do |file|
 		file.each do |line|
 			data =	line.split("|")
 			teacher = OpenStruct.new({ :d_cv => "#{data[3]}",:c_cmail => "#{data[2]}", :b_name => "#{data[1]}",:a_user => "#{data[0]}" })
			teachers << teacher
		end
	end

# Configure
GoogleSpreadsheet.config do |c|
  c.email               = "julianez@gmail.com"
  c.password            = "J3c43v3rry"

  # optional, see note below on how to obtain a spreadsheet key
  c.default_spreadsheet = "0Ag2yp2M71kardHpkbG4tc0Y3U3FmOGtRamdtWUQ2NGc"
end

teachers.to_google_spreadsheet("Teachers")

# Populates the worksheet "Employees" in the default spreadsheet 
# with two employees
# [
#   {:name => "Bob", :age => 26}, 
#   {:name => "Julian", :age => 28}
# ].to_google_spreadsheet("Employees")

# Populates the worksheet "Signups" in the nondefault spreadsheet 
# with two signup dates
#[
#  {:date => "18/7/2011", :signups => 28},
#  {:date => "19/7/2011", :signups => 33}
#].to_google_spreadsheet("Signups", "other_spreadsheet_key")

# Populates the worksheet "Accounts" in the default spreadsheet 
# with all # accounts in the database
#Account.all.to_google_spreadsheet("Accounts")