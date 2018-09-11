# rtcamp-plugin-assigment-

<b>My submission for rtCamp Plugin Assignment</b>
<hr />
You can watch the demo of the front end <a href="https://rtcamps-plugin-assigment.000webhostapp.com/slideshow-plugin">here</a>
<hr />
<h1><b>Important Note</b></h1>
<hr />
<code>
Whenever You Clone or Download the plugin from GITHUB and if the directory name contains the name as <br />
<b><strike>rtcamp-plugin-assigment-1-master</strike></b> then change it to <b><u>rtcamp-plugin-assigment-1</u></b>. Remove the " -master " from the directory name.
</code>
<hr />
<h1><b>Features</b></h1>
<hr />
<ul>
  <li><b>Upload Images:</b> Images are stored in database and dynamically managed by the admin add/remove.</li>
  <li><b>Manual Slider Navigation:</b> The slider navigation is done in 2 ways, First is by the thumbnail images provided below and Second way is by the Previous and Next "TEXT LINKS" provided ( '<' and '>' symbols were not working so provided text ).</li>
  <li><b><u>ShortCode:</u></b> To get the front end in any page or post just use <b>[do-it id="1"]</b> in that page. The Shortcode is parameterised so in the place of "1" you can change the parameter to your category id.</li>
  <li><b>Coding Standards:</b> Coding standards of OBJECT ORIENTED PHP and Variable naming convention are also followed.</li>
  <li><b>Unit Testing:</b> The initialisation of the public class is unit tested.</li>
  <li><b>Sorting and Changing Positions:</b> Position of the images can be swapped with the Scrollable Functionalities.</li>
  <li><b>Dependencies:</b> The Testing dependencies are managed by COMPOSER. (Vendor folder is git ignored)</li>
  <li><b>Categorised Slider:</b> This slider is seperated category wise so insert a category manage categories and images along with the categories.</li>
  <li><b>Visual Button:</b>There is a button for adding the shortcode to the page or post in Visual Editor Toolbar</li>
  <li><b>By Default Id:</b>When you click on the button in visual editor to add shortcode it will by default load the category 1. If you want to change then you can manually change the id in the page or post. And if you dont pass any id in the shortcode parameters then 1 is set as default parameter.</li>
</ul>
<hr />
<h1><b>Installation</b></h1>
<hr />
<code>
get the git clone https://github.com/harshiljoshi37/rtcamp-plugin-assigment-1/path-to-plugins-folder/rtcamp-plugin-assigment-1
install PHPUNIT by below command in the "rtcamp-plugin-assigment-1" plugins folder
composer require --dev phpunit/phpunit ^7
</code>
<hr />
<h1><b>License</b></h1>
<code>
All the contents of this repository are licensed under the GPL v2 or later.<br />
This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License, version 2, as published by the Free Software Foundation.<br />
This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.<br />
You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA<br />
A copy of the license is included in the root of the plugin’s directory. The file is named LICENSE.
</code>
