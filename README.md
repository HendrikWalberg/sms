# sms smslansombeviljaralla.se
## A school project

####Table of contents

[Logbook](#logbook)<br>
[Finance](#finance)<br>
[Requirements](#requirements)<br>
[Technical Stack](#technical)<br>
[API](#api)<br>
[API Rotes](#api-routes)<br>
[External API](#external-api)<br>
[Security](#security)<br>
[Design](#design)<br>

##Logbook - SMS-Lån som beviljar alla <a name="logbook"></a>

###*8h per day (usually 08:00 - 17:00, supervisor can verify).

####17/3 2021 
I have begun the process of starting the project. I have initiated a project/repo in github, started a new project on my terminal, and made sure that the project is modified properly.
Fundamental aspects of design have been implemented in “design specs” and fundamental technical specification has been implemented in “tech specs”. First versions of text-area, faq and hero section templates.

<hr>

####18/3 2021
Refactorization on text-area. Added first version of index-list, footer, header, inner-outer-box templates.

<hr>

####19/3 2021
Refaktoring all templates as the front-page is built. Floating-box template created. Design template provided. Refactorization of front-end required.

<hr>

####22/3 2021
Begun refactorization. First graphics meeting dealing with refactorization done (favourable reaction from customer :D ).  Implementing a new layout using inner-outer-box template as divider. "hr" tags Becomes dividers. Scrollable headers into the link list.

<hr>

####23/3 2021
Establishing contact with external financial api and evaluating response data. Updated technical data.

<hr>

####24/3 2021
Continues to make the plugin. Connection to external api established. Database created.

<hr>

####25/3 2021
Continues to make the plugin. Problems when applying concepts from PDO on WPDB. Attempting to fix. Successfully implemented WPDB. Automatically updates DB once a day. Routs “get-all-programs” and “get-one-program” now active and serving data.

<hr>

####26/3 2021
The plugin is taking shape. The financial api is missing pertinent data though. I have created a function to injekt certain data into the template after fetching data from the database. 

<hr>

####29/3 2021
Starting front-end implementation of api/plugin.

<hr>

####30/3 2021
Continuing the implementation of the front end. Two persistent errors solved.

<hr>

####31/3 2021
Today I will deal with the vertical overflow of the different templates and make sure that everything up until now collapses gracefully into different screen sizes and resolutions.
I began implementing a filter function for the programs. I realised that I need to change the callback functions in the backend.  

<hr>

####6/4 2021
Back from easter! Today I will attempt to fix the callback function in the backend in order to match the front end requirements. Implemented a filter function and related api route in backend. Added warning text and loan examples. Styling has progressed.

<hr>

####7/4 2021
Today I will try to refactor the backend and fix graphics details.

-Separate data from logic.

<hr>

####8/4 2021
Same as yesterday. No progress.

<hr>

####9/4 2021
Same as yesterday. Some progress: $wpdb->replace($table_name, $programs). Succeeded in refactorization. tbs_update_database() is now a fraction of earlier size.

<hr>

####12/4 2021
polish front-end. Padding and margins are unsatisfactory across the entire site. Maybe I need glasses. 

<hr>

####13/4 2021
Meeting regarding polish. Positive feedback. Some text shadow and font-weight needs modification. Example-cards are to be revamped. Images replaced. Footer changed. Colors revamped.

<hr>

####14/4 2021
Planning About us page. Writing SEO texts

<hr>

####15/4 2021
Same as yesterday. About page alpha version done. Header and footer alpha version done.

<hr>

####16/4 2021
Technical planning for further features. Considerations include:

Should I implement a login functionality that enables the user to save data inside api? This would demand that we change our cookie and integrity policy.
Should I upload this MVP to a server to start building link force? (This must include later updates to functionality and thus the MVP is NOT the final product).

I landed with the decision to make a newsletter. Deploying MVP is still in the air.
Today I refactored the header animation again.

<hr>

####19/4 2021
Today I will plan out the newsletter att make sure I completely understand the task at hand. Ended up redesigning the mobile header menu. Container issue. This is the third time the nav menu is redesigned. XD 

<hr>

####20/4 2021
Continuing to solve container issues. Fade function on the expanding mobile menu is currently not working.

<hr>

####21/4 2021
Continuing to solve menu issues. Code base structure is unsatisfactory. I have found a solution for the fade effect but I need to run some experiments to see that it is robust. 

<hr>

####22/4 2021
Refactoring. I don’t seem to be able to make myself satisfied with how the api code works. I’m considering attempting a separation of the JQuery into smaller modules. I have begun to produce SEO optimized text for the site.

<hr>

####23/4 2021
Refactoring. I’m looking into the newsletter again. But it is highly probable that that functionality won’t be included in the final product. I just found out that jquery refuses to accept “let” variable declarations. I’m forced to use “var”. This has waste a lot of time. Alot…

I have continued to produce text, they will sit in a seperate folder for now.

<hr>

####26/4 2021
I'm considering abandoning the concept of a personally created login system. There seems to be no reason to implement RBAC in this product. And I just noticed that I have forgotten to push my code to github. A well My proctor put very little emphasis on this. The figma file has been ignored during this project. 

<hr>

####27/4 2021
Today I will walk through the requirements for passing this examination. The requirements are:

**First section:**
Skisser, wireframes, funktionsbeskrivningar, ER/Databasdiagram (om ej applicerbart diskutera med handledare)

Kravspecifikation, begränsningar och målplattformar ska dokumenteras
Programkod som följer vedertagna och etablerade standarder för både JS och/eller PHP*

Programkod som är kommenterad och dokumenterad, innefattar även externa beroenden*

Individuell dokumentation av arbetsprocessen i form av en loggbok där man enkelt ska kunna följa arbetsgången av din insats efter avslutat arbete

Kunna visa på att minst 300 timmar har lagts på arbetet (upplevs det att resultatet av examensarbetet inte är tillräckligt kommer loggbok att och commits att vara till stor hjälp)
 
**Result**
The wireframes are not applicable (I have discussed this with my supervisor). I have made a database diagram and ER diagram.
Missing some parts.
Yes, my code follows the standard wordpress code standards.
Will add comments later today.
Yes, this is it.
Yes, this is it.
 
**Second section (obligatory)**
Yes, I use wordpress as a framework.
Yes, I have used github.
The backend uses PHP in the form of a self-made plugin.
Security rationale will be made later today.
 
**Third section** (elective, I will present the four chosen subjects).
Self made relational database(MySql). (Alpha Done)
Integration of external API. (Alpha Done)
Responsive layout. (Alpha Done)
Self made internal API. (Alpha Done)
 
After the frontend design has been cleared by the CTO and CDO, I will move forward with live testing later this week och the beginning of next week. :) :) :) . This experiment will continue until the speed of the site is satisfactory. It will also serve to screen for any bugs.
 
During inspection the CTO and CDO brought several graphics bugs to my attention. I will fix them ASAP. Fixed faq, menu, example cards and footer.

<hr>

####28/4 2021
The inspection went so so. There are several bugs. Some of which I thought I fixed yesterday. I think I was negligent in identifying the true bugs. I will move forward with crushing these bugs today.
 
14.00 - 14.20 : Meeting with Chas Academy.
 
I can’t seem to wrap my head around what is going on with my code. Very frustrating.

<hr>

####29/4 2021
I have fixed all graphics bugs today. The error was caused by a combination of bad CSS and bad JS. I will have to make another once over.
I have also found a bug in the backend api. Fixed it fairly quickly. For some reason the $data array refused to be assigned to variables. 

<hr>

####30/4 2021
I have been doing a once over for the site and found the color scheme is all over the place. I will attempt to have a meeting with the product owner next week to discuss this. Basically, the images used in the project are projecting a set of five colors that is not included in the base palette. 

<hr>

####3/5 2021
After reading a large amount of law text I became concerned that the product owner was at risk. Basically the laws in Sweden concerning payday loans are extremely stringent. I have called an emergency meeting with the product owner.
 
At the meeting I was told that affiliate marketing does not conform to the same laws as the lenders themselves. The product owners are in the clear.
 
I will spend the rest of the day, fixing the color scheme with new images.

<hr>

####4/5 2021
Was critiqued on the JS belonging to the index-list component today. Likewise the product owner expressed a need for further functionality.

It took me 9h to fix it but its done. Now the component is more responsive, sticky, its links does not change the url and the ids are numeric values rather than letters.

<hr>

####5/5 2021
Today I will focus on finally getting my refractions right with code-jesus. It is done, turns out I was forgetting a $-variable declaration. 

<hr>

####6/5 2021
I have been focusing on making sure that the site is as responsive as possible. Some minor fixes graphically across the site have been necessary. Hopefully I will deploy a MVP tomorrow.
 
<hr>

####7/5 2021
I have included a lot of new texts in the site today. Three subpages have been added. The overflow of links in the header have revealed a flaw in my layout. Will probably be unable to deploy MVP today. Refactored programs_render. Now it has the option om rendering a “?” for missing data.
 
<hr>

####10/5 2021
Fixed the last graphical considerations. Added a lot of text to the sites subpages. Deployed MVP, there are some problems with the security certificate on the domain provider side.
 
<hr>

####11/5 2021
Today I will fix the security issue. I will also add three new pages to the site. 
 
The issue is fixed. The site is live and is pulling linkpower, pagerank and traffic.
Several new pages have been added with search engine optimized text and linktext. This site is now more than an MVP, it's a finished product.
 
**PageSpeed Insights: 100% for laptop, 99% for mobile. HTTPS encryption. 8 pages of SEO text and links. Google analytics active. It is a good day!** 

<hr>

####13/5 2021 
Some smaller quality of life improvements to the interface. Been working with the associated paperwork. I have been analysing the result prognosis for the page ranking. I have been having meetings with the product owners and getting feedback from them. If I am lucky, this will be the last day of production. 

<hr>

##Project description:

####Purpose and finance <a name="finance"></a>

This site will aggregate and disseminate financial data pertaining to the pay-day loans on the Swedish market. Primarily this will lead to revenue through affiliate marketing programs. Secondarily it will aggregate linkpower that will be disseminated to SEO customers. 

<hr>

####Requirements list <a name="requirements"></a>
- The user must be able to browse and filter financial data.
- The links presented to the user must hit the API endpoints in Adtraction so Tribusofts affiliate program aggregate hits.
- The site must be completely responsive.
- The site must implement the external API “Adtraction”.
- The entire site must be optimized for google page ranking.
- All external links must be no follow unless the receiving party pays for SEO support.
- The site must have an internal database that holds the financial data, thus speeding up the site.
The internally held data will be updated by a cron-job once a day.
- The api, mysql and AJAX calls must be handled through the creation of a plugin.
- The site must implement an internal API to make the internally held data available to the front end.
- The combination of Timber and ACF must be used to create a custom page builder from scratch inside the custom theme (sms).
The components of the pagebuilder must be flexible, modular and reusable.
- The project must implement the Tribusoft standard tech stack: Twig, ACF, CSS (Less as preprocessor), PHP, JQuery and Wordpress.
- The project must implement version handling through github.


<hr>

####Technical specifications - SMS-Lån som beviljar alla <a name="technical"></a>

The technologies that will be implemented are Wordpress, Timber (Twig), ACF, LESS, PHP and JQuery.

Wordpress will be used as a framework. This will make page SEO administration much easier. The Timber extensions will be implemented. This will enable the use of twig templates when building the frontend. ACF will enable the ability to inject variable values from the wordpress backend view. ACF will be used to create my own custom pagebuilder. JQuery will be used to make the page dynamic and handle AJAX actions. JQuery will be used because it comes prepackaged with Wordpress. PHP will be used because that is what Wordpress is built on and it is required for the creation of a plugin.  

####API plugin <a name="api"></a>
The API plugin is called Adtraction-fetch. It is called this because this is what it does. It has three primary functions.
It creates a database with relevant rows to handle the api response from Adraction.
It fetches fresh data from Adraction using the affiliate route that is unique to Tribusoft. It then updates the sites internal database with this fresh data.
It makes this data available to the frontend by serving it though API routes.

####API Routes <a name="api-routes"></a>
All API routes are prefixed with the standar wordpress API url structure with the custom structure added, namespaced with “adtraction-fetch/v1”.

GET - all programs
{baseURL} /wp-json/adraction-fetch/v1/get-all-programs

This route returns all data entries in the database.

GET - one program (not yet in use)
{baseURL} /wp-json/adraction-fetch/v1/get-one-program

This route returns one entry in the database.

GET - filter programs
{baseURL}/wp-json/adraction-fetch/v1/get-filter-programs

This endpoint accepts two parameters: uc and remark; “uc” represent whether the programs use UC as a credit check; “remark” represent whether the program accepts clients with economic remarks.

these parameters are sent with the url in the standard query structure in Wordpress best-practice. (?={uc},&={remark})

GET - update programs (Special case)
{baseURL}/wp-json/adraction-fetch/v1/update-programs

This endpoint updates the data inside the internal database. All AJAX and MySql actions are handled on the backend and never interacts with the consumer. The consumer may trigger an update to the database if the route is called.

<hr>

####External api requests. <a name="external-api"></a>

API Name: Adtraction API v2
API Route: Compare PayDay Loans

The api will be called from a backend function (plugin) that is scheduled with a cron-job to run once a week in order to serve reliable financial information. Separate MySql database will be implemented, modeling the received JSON data and serving it to the frontend. 

Some data that exists in this API include unique keys that identify the site as belonging to Tribusoft affiliate program. All provisioning is handled automatically and gives Tribusoft credit for every lead delivered to the companies documented inside the API.

<hr>

####Application security <a name="security"></a>
I will use a simple formula to motivate my analysis in this segment. This formula represent the most basic security analysis in mathematical organizational security.

X = Risk of an incident occurring. (valued 1 - 10)
Y = Consequences of such an incident. (valued 1 - 10)

X * Y = Danger level (1 - 100%).

Wordpress is not a fortress. It should never be used to handle really sensitive data. A determined and skilled attacker will almost certainly be successful in breaching security regardless of measures taken. However, steps may be taken to mitigate the threat of amateurs. This site does not store ANY sensitive personal data. It handles all database modification on the backend and only through trusted parties (Adtraction). All data entries are sanitized. PUT and POST are not used in the infrastructure. The database must therefore be considered secure and not worthy of breaching. The webbhotell used (Miss Hosting) have security measures in place for simple attack vectors such as ddos attacks and the like. 

The consequences of a data breach are nonexistent. If an attacker successfully brings the site down, it can be reuploaded withing two hours. The consequences for denial of service is nonexistent.

The motivation to attack the site should be in the lower ranges. There is simply not enough visibility nor any monetary value to motivate an sophisticated attacker.

I deem the danger level to be inte the range of X = 3 (very low) * Y = 1 nonexistent) = 3.

Steps taken to mitigate this threat level: The webhosting service has automatic messaging if the site stops working. All database handling is sanitized and only includes trusted parties. A copy of the code base exists on github in case of a complete failure. No sensitive data are stored in the system.

<hr>

####Design <a name="design"></a>
The use of wireframes and figma was rejected by the tech lead. This is mainly because of the fact that there exist stringent rules about how such a website can be presented. Thus alla design follows a similar pattern. The developer was tasked to scout out the competition and amalgamate their sites. The product owner has been tweaking the design during the entirety of the project. The design has been changed a large number of times. 

<hr>

####User stories, personas and such
The use of user stories, personas, epics and other such datasets was rejected by the tech lead. 


<hr>

####Target platforms
Anything with a web browser

<hr>

####Limitations
The project extends to and is limited by what is written above.