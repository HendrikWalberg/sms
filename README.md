# sms smslansombeviljaralla.se
## A school project

----

## On this page
{:toc}

----

## Logbook - SMS-Lån som beviljar alla

### *8h per day (usually 08:00 - 17:00, supervisor can verify).

#### 17/3 2021 
I have begun the process of starting the project. I have initiated a project/repo in github, started a new project on my terminal, and made sure that the project is modified properly.
Fundamental aspects of design have been implemented in “design specs” and fundamental technical specification has been implemented in “tech specs”. First versions of text-area, faq and hero section templates.

<hr>

#### 18/3 2021
Refactorization on text-area. Added first version of index-list, footer, header, inner-outer-box templates.

<hr>

#### 19/3 2021
Refaktoring all templates as the front-page is built. Floating-box template created. Design template provided. Refactorization of front-end required.

<hr>

#### 22/3 2021
Begun refactorization. First graphics meeting dealing with refactorization done (favourable reaction from customer :D ).  Implementing a new layout using inner-outer-box template as divider. "hr" tags Becomes dividers. Scrollable headers into the link list.

<hr>

#### 23/3 2021
Establishing contact with external financial api and evaluating response data. Updated technical data.

<hr>

#### 24/3 2021
Continues to make the plugin. Connection to external api established. Database created.

<hr>

#### 25/3 2021
Continues to make the plugin. Problems when applying concepts from PDO on WPDB. Attempting to fix. Successfully implemented WPDB. Automatically updates DB once a day. Routs “get-all-programs” and “get-one-program” now active and serving data.

<hr>

#### 26/3 2021
The plugin is taking shape. The financial api is missing pertinent data though. I have created a function to injekt certain data into the template after fetching data from the database. 

<hr>

#### 29/3 2021
Starting front-end implementation of api/plugin.

<hr>

#### 30/3 2021
Continuing the implementation of the front end. Two persistent errors solved.

<hr>

#### 31/3 2021
Today I will deal with the vertical overflow of the different templates and make sure that everything up until now collapses gracefully into different screen sizes and resolutions.
I began implementing a filter function for the programs. I realised that I need to change the callback functions in the backend.  

<hr>

#### 6/4 2021
Back from easter! Today I will attempt to fix the callback function in the backend in order to match the front end requirements. Implemented a filter function and related api route in backend. Added warning text and loan examples. Styling has progressed.

<hr>

#### 7/4 2021
Today I will try to refactor the backend and fix graphics details.

-Separate data from logic.

<hr>

#### 8/4 2021
Same as yesterday. No progress.

<hr>

#### 9/4 2021
Same as yesterday. Some progress: $wpdb->replace($table_name, $programs). Succeeded in refactorization. tbs_update_database() is now a fraction of earlier size.

<hr>

#### 12/4 2021
polish front-end. Padding and margins are unsatisfactory across the entire site. Maybe I need glasses. 

<hr>

#### 13/4 2021
Meeting regarding polish. Positive feedback. Some text shadow and font-weight needs modification. Example-cards are to be revamped. Images replaced. Footer changed. Colors revamped.

<hr>

#### 14/4 2021
Planning About us page. Writing SEO texts

<hr>

#### 15/4 2021
Same as yesterday. About page alpha version done. Header and footer alpha version done.

<hr>

#### 16/4 2021
Technical planning for further features. Considerations include:

Should I implement a login functionality that enables the user to save data inside api? This would demand that we change our cookie and integrity policy.
Should I upload this MVP to a server to start building link force? (This must include later updates to functionality and thus the MVP is NOT the final product).

I landed with the decision to make a newsletter. Deploying MVP is still in the air.
Today I refactored the header animation again.

<hr>

#### 19/4 2021
Today I will plan out the newsletter att make sure I completely understand the task at hand. Ended up redesigning the mobile header menu. Container issue. This is the third time the nav menu is redesigned. XD 

<hr>

#### 20/4 2021
Continuing to solve container issues. Fade function on the expanding mobile menu is currently not working.

<hr>

#### 21/4 2021
Continuing to solve menu issues. Code base structure is unsatisfactory. I have found a solution for the fade effect but I need to run some experiments to see that it is robust. 

<hr>

#### 22/4 2021
Refactoring. I don’t seem to be able to make myself satisfied with how the api code works. I’m considering attempting a separation of the JQuery into smaller modules. I have begun to produce SEO optimized text for the site.

<hr>

#### 23/4 2021
Refactoring. I’m looking into the newsletter again. But it is highly probable that that functionality won’t be included in the final product. I just found out that jquery refuses to accept “let” variable declarations. I’m forced to use “var”. This has waste a lot of time. Alot…

I have continued to produce text, they will sit in a seperate folder for now.

<hr>

#### 26/4 2021
I'm considering abandoning the concept of a personally created login system. There seems to be no reason to implement RBAC in this product. And I just noticed that I have forgotten to push my code to github. A well My proctor put very little emphasis on this. The figma file has been ignored during this project. 

<hr>

#### 27/4 2021
Today I will walk through the requirements for passing this examination. The requirements are:

**First section:**
Skisser, wireframes, funktionsbeskrivningar, ER/Databasdiagram (om ej applicerbart diskutera med handledare)
Kravspecifikation, begränsningar och målplattformar ska dokumenteras
Programkod som följer vedertagna och etablerade standarder för både JS och/eller PHP*
Programkod som är kommenterad och dokumenterad, innefattar även externa beroenden*
Individuell dokumentation av arbetsprocessen i form av en loggbok där man enkelt ska kunna följa arbetsgången av din insats efter avslutat arbete
Kunna visa på att minst 300 timmar har lagts på arbetet (upplevs det att resultatet av examensarbetet inte är tillräckligt kommer loggbok att och commits att vara till stor hjälp)
 
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

#### 28/4 2021
The inspection went so so. There are several bugs. Some of which I thought I fixed yesterday. I think I was negligent in identifying the true bugs. I will move forward with crushing these bugs today.
 
14.00 - 14.20 : Meeting with Chas Academy.
 
I can’t seem to wrap my head around what is going on with my code. Very frustrating.

<hr>

#### 29/4 2021
I have fixed all graphics bugs today. The error was caused by a combination of bad CSS and bad JS. I will have to make another once over.
I have also found a bug in the backend api. Fixed it fairly quickly. For some reason the $data array refused to be assigned to variables. 

<hr>

#### 30/4 2021
I have been doing a once over for the site and found the color scheme is all over the place. I will attempt to have a meeting with the product owner next week to discuss this. Basically, the images used in the project are projecting a set of five colors that is not included in the base palette. 

<hr>

#### 3/5 2021
After reading a large amount of law text I became concerned that the product owner was at risk. Basically the laws in Sweden concerning payday loans are extremely stringent. I have called an emergency meeting with the product owner.
 
At the meeting I was told that affiliate marketing does not conform to the same laws as the lenders themselves. The product owners are in the clear.
 
I will spend the rest of the day, fixing the color scheme with new images.

<hr>

#### 4/5 2021
Was critiqued on the JS belonging to the index-list component today. Likewise the product owner expressed a need for further functionality.

It took me 9h to fix it but its done. Now the component is more responsive, sticky, its links does not change the url and the ids are numeric values rather than letters.

<hr>

####  5/5 2021
Today I will focus on finally getting my refractions right with code-jesus. It is done, turns out I was forgetting a $-variable declaration. 

<hr>

####  6/5 2021
I have been focusing on making sure that the site is as responsive as possible. Some minor fixes graphically across the site have been necessary. Hopefully I will deploy a MVP tomorrow.
 
<hr>

####  7/5 2021
I have included a lot of new texts in the site today. Three subpages have been added. The overflow of links in the header have revealed a flaw in my layout. Will probably be unable to deploy MVP today. Refactored programs_render. Now it has the option om rendering a “?” for missing data.
 
<hr>

#### 10/5 2021
Fixed the last graphical considerations. Added a lot of text to the sites subpages. Deployed MVP, there are some problems with the security certificate on the domain provider side.
 
<hr>

#### 11/5 2021
Today I will fix the security issue. I will also add three new pages to the site. 
 
The issue is fixed. The site is live and is pulling linkpower, pagerank and traffic.
Several new pages have been added with search engine optimized text and linktext. This site is now more than an MVP, it's a finished product.
 
**PageSpeed Insights: 100% for laptop, 99% for mobile. HTTPS encryption. 8 pages of SEO text and links. Google analytics active. It is a good day!** 

<hr>

#### 13/5 2021 
Some smaller quality of life improvements to the interface. Been working with the associated paperwork. I have been analysing the result prognosis for the page ranking. I have been having meetings with the product owners and getting feedback from them. If I am lucky, this will be the last day of production. 

<hr>