require 'rubygems'
require 'nokogiri'
require 'open-uri'

def get_info(country,url)
	begin

	
		puts "searching ... #{url}"
	  
		indeed = Nokogiri::HTML(open(url)).css(".row")
	
		indeed.each do |job|
			
			title=URI::encode(job.css('h2').first.content.squeeze(" ").strip)
			puts "Job Title: "+job.css('h2').first.content.squeeze(" ").strip+"</br>"
			
			company=URI::encode(job.css('.company span').text.squeeze(" ").strip)
			puts "Company: "+job.css('.company span').text.squeeze(" ").strip+"</br>"
			
			location=URI::encode(job.css('.location span').text.squeeze(" ").strip)
			puts "Location: "+job.css('.location span').text.squeeze(" ").strip+"</br>"
			
			summary=URI::encode(job.css('.summary').text.squeeze(" ").strip)
			puts "Summary: "+job.css('.summary').text.squeeze(" ").strip+"</br>"
			
			source=URI::encode(job.css('.sdn').text.squeeze(" ").strip)
			puts "Source: "+job.css('.sdn').text.squeeze(" ").strip+"</br>"
			
			
			response = Net::HTTP.get_response(URI.parse("http://co.indeed.com"+job.css('h2 a').first.attributes['href'].value))		
 
  			link=response['location']
			puts "Link: "+response['location']+"</br>"
		
			puts "</br>"
			eduurl="http://edufolium.com/intl/mod/edujobs/ext-jobs.php?country="+country+"&title="+title+"&company="+company+"&location="+location+"&summary="+summary+"&source="+source+"&link="+link
					
			puts eduurl
			
			response2 = Net::HTTP.get_response(URI.parse(eduurl))				
			puts "</br>"
			puts "</br>"				
			puts "</br>"
				
		end	
	end
end


#Colombia
		puts "Colombia ..."
		url="http://co.indeed.com/trabajo?as_and=&as_phr=&as_any=docente+profesor&as_not=&as_ttl=&as_cmp=&jt=all&st=&radius=25&fromage=1&limit=100&sort=&psf=advsrch"
		get_info("Colombia",url)
			
#Argentina
#		puts "Argentina ..."
#		url="http://ar.indeed.com/trabajo?as_and=&as_phr=&as_any=profesor+docente&as_not=&as_ttl=&as_cmp=&jt=all&st=&radius=25&fromage=1&limit=100&sort=&psf=advsrch"
#		get_info("Argentina",url)
		
#Chile
#		puts "Chile ..."
#		url="http://www.indeed.cl/trabajo?as_and=&as_phr=&as_any=docente+profesor&as_not=&as_ttl=&as_cmp=&jt=all&st=&radius=25&fromage=1&limit=100&sort=&psf=advsrch"
#		get_info("Chile",url)
		
#Peru
#		puts "Peru ..."
#		url="http://www.indeed.com.pe/jobs?as_and=&as_phr=&as_any=docente+profesor&as_not=&as_ttl=&as_cmp=&jt=all&st=&radius=25&fromage=1&limit=100&sort=&psf=advsrch"		
#		get_info("Chile",url)
		
#Venezuela
#		puts "Venezuela ..."
#		url="http://ve.indeed.com/jobs?as_and=&as_phr=&as_any=docente+profesor&as_not=&as_ttl=&as_cmp=&jt=all&st=&radius=25&fromage=1&limit=100&sort=&psf=advsrch"
#		get_info(url)
		
#Mexico
#		puts "México ..."
#		url="http://www.indeed.com.mx/trabajo?as_and=&as_phr=&as_any=docente+profesor&as_not=&as_ttl=&as_cmp=&jt=all&st=&radius=25&fromage=1&limit=100&sort=&psf=advsrch"						
#		get_info(url)