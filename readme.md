# Logging System

# Table of Contents
- [Introduction](#intro)
- [Official Documentation](#official)
- [Special Thanks](#thanks)
- [Future Features](#future)

#<a name="intro"></a>Introduction

Media-link to be made

This web application is mainly for use by Media Support at NYU Tandon School of Engineering. The purpose of this web application is to help the team log all A/V activity within the workplace. 

Logging System utilizes the Laravel Framework along with Eloquent ORM and the Database is in MySQL. 


## <a name="official"></a>Official Documentation

- [Types](#types)
- [Assets](#assets)
- [Attributes](#attributes)
- [Issues](#issues)
- [Comments](#comments)
- [Loans](#loans)
- [Room Check](#roomcheck)
- [Users](#users)

###<a name="types"></a>Types

Type is pretty self explanatory - use are describing each component in a room. If you're describing a projector, the type is projector. The list of types would be made into a list and can be modified for removal or addition. Any modifications in the type list can only be made by an authorized user.

###<a name="assets"></a>Assets

Assets is each individual object itself. In a classroom, you have a set of equipments. Each equipment is an asset and is linked to a specific type (i.e. projector or blu-ray player). Assets are also linked to several attributes which will be described later below. Assets even include the room itself or even a cart. Anything that can hold another asset must be considered a container and if an asset is in another asset, the container must be stated. Assets can only be modified by an authorized user.

###<a name="attributes"></a>Attributes

An attribute would be attributes of an asset. Many attributes can be connected to many assets but an asset cannot have two of the same attributes. There are several projectors but they are not all the same brands. Therefore, an attribute would be the brand. When you link an attribute to an asset, a value must be set. Attributes can only be modified, or linked, by an authorized user.
For example: I have a Ben-Q projector. The projector is already an asset in the database but there are no attributes linked to it. So, link the 'brand' attribute to the projector and I label the brand as Ben-Q. Now we know that there is a Ben-Q projector as an equipment. 

###<a name="issues"></a>Issues

When some asset does not work or function properly, an issue can be created for that asset. The issue would have to be created by a user and the issue would be created in a form. The form will only ask for an asset id and priority. The issues will have status which indicates whether or not the issue has not started, is in the process of, or completed. Each issue can be connected to multiple comments.

Issues will be listed on one page and there is an option to change the status of the issue. If the status is listed as completed, a comment needs to be submitted as to how it was fixed.

###<a name="comments"></a>Comments

Comments can be connected to one issue. The comments can either be in regards to the issue itself or to the solution to the issue. The indication needs to noted for the comment before linking it to the issue id.

###<a name="loans"></a>Loans

Loans are any portable equipment that are mainly used for temporary use. The purpose of this function is to understand the borrowing frequency of certain assets. Anyone can loan assets.
Loans would be submitted in a form that requires the following:
	* an asset id that does not have a container 
	* the room it's going to
	* the name of borrower
	* email(netID) of the borrower
	* comments before lending if it is an expensive asset or about what event it is for. 
	* the time or day the equipment is due
	* status -> whether or not the equipment is still out or has been returned. 

Note that the loanable equipment needs an attribute of loans and the value is incremented everytime the form is filled and if the asset is still labeled as out, the asset cannot be loaned until 'returned' is pressed.


If it is just a room with problems, 
	* name = Issue 
	* email = webteam@poly.edu
	* comments = can leave blank
	* due = 1-2 weeks from the day of loans

###<a name="roomcheck"></a>Room Check

Room checks are crucial during room availabilities. It allows Media Support to check on the equipments(assets) in the room and make sure everything is readily working for any classes that will/may occur and to document any issues that users might not have submitted. Anyone can do room checks.

Room Checks will be done as follows:
	1. Choose a room.
	2. All assets that lists that room as its container will be listed.
	3. Checker must go through each equipment and make sure it's working properly.
	4. For any assets that is not performing correctly, check off the box next to it.
	5. Even if there is no discoverable error, "Checked Room"  MUST be pressed. 
	6. If there assets with checked off boxes, "Checked Room" will redirect to a form that will allow the checked to write comments in regards to the issues connected to the asset.
		- The comment is necessary for future fixing. 
		- Must submit each comment seperately. 
		- The comments will be marked as not a solution.

The Room Check function is also used to mark any issues found in the room. If a professor calls about a problem, the room check must be used to indicate that there was an issue.  

###<a name="users"></a>Users

There are two types of users:
*authorized
*student

Authorized users are obviously myself and any managers in the department. Authorized can do the following:
* Modify/Add/Remove Types
* Modify/Add/Remove Assets
* Modify/Add/Remove Attributes
* Modify/Add/Remove Users
* Room Checks (Includes Issues and Comments)
* Loans

Student users are users that work for the department and have work-study. Students can do the following:
* Room Checks(Includes Issues and Comments)
* Loans



## <a name="thanks"></a>Special Thanks

Special thanks to Aleksandr Rogozin and Randy Sofia for their assistance and teaching throughout the development process.

## <a name="future"></a>Future Features

	* Form for requests
	* Logging in two different ways
	* Chat feature between online users
	* Updating certain asset-attribute values in room check i.e. lamp hours
	* Loanable equipment can be from storage and still be loaned out


