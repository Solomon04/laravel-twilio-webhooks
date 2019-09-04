# Laravel + Twilio Webhooks

This repo teaches how to make phones calls or text messages with masked phone numbers using Twilio webhooks & Laravel. Learn more with the <a href='https://www.twilio.com/docs/sms/tutorials/masked-numbers'>Twilio Docs</a>

## Introduction

#### What Is Masking Phone Numbers?
As Twilio states:
> Masked calling is a technique used in ecommerce to protect buyers' and sellers' personal phone numbers private. It uses a short-lived phone number for each party, allowing them to communicate seamlessly during a specified time period. After the time period has expired, the numbers are recycled and reassigned to other parties on the platform, which helps keep transactions from happening outside the platform. 


#### What Does The Boilerplate Do?
This boilerplate demonstrates in the most basic way how you can mask phone numbers with Twilio. We have two tables, a users table and a numbers table with our Twilio phone numbers. A user can call or text another user's Twilio phone # where our code will then route the call or text to the other user's actual phone number without exposing their real phone # for privacy sake. 

#### Flow of a Masked Phone Call:
![demo](https://s3.amazonaws.com/com.twilio.prod.twilio-docs/images/proxy_overview_graphic.width-800.png)