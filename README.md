Cloudflare API Tools

A collection of tools and commands for interacting with the Cloudflare API. This repository includes both PHP scripts and curl commands for managing your Cloudflare resources.

Quick Curl Commands

Prerequisites
A Cloudflare API token with appropriate permissions
curl installed on your system

Authentication
Replace YOUR_TOKEN in the commands with your Cloudflare API token.

Available Commands
Verify Token
Verify your API token permissions:
bashCopycurl -k -X GET "https://api.cloudflare.com/client/v4/user/tokens/verify" \
     -H "Authorization: Bearer YOUR_TOKEN" \
     -H "Content-Type: application/json"
List Accounts
Get all accounts accessible with your token:
bashCopycurl -k -X GET "https://api.cloudflare.com/client/v4/accounts" \
     -H "Authorization: Bearer YOUR_TOKEN" \
     -H "Content-Type: application/json"
List Zones
Get all zones (domains):
bashCopycurl -k -X GET "https://api.cloudflare.com/client/v4/zones" \
     -H "Authorization: Bearer YOUR_TOKEN" \
     -H "Content-Type: application/json"
List DNS Records
Get DNS records for a specific zone:
bashCopycurl -k -X GET "https://api.cloudflare.com/client/v4/zones/ZONE_ID/dns_records" \
     -H "Authorization: Bearer YOUR_TOKEN" \
     -H "Content-Type: application/json"
Get Account Details
Get details for a specific account:
bashCopycurl -k -X GET "https://api.cloudflare.com/client/v4/accounts/ACCOUNT_ID" \
     -H "Authorization: Bearer YOUR_TOKEN" \
     -H "Content-Type: application/json"
Note: The -k flag disables SSL verification. Use with caution in production environments.
PHP Script
Prerequisites

PHP 7.0 or higher
PHP curl extension
Cloudflare API token

Installation

Clone this repository
Replace your_api_token_here in the script with your Cloudflare API token
Run the script:
bashCopyphp cloudflare-sites.php


Features

Lists all accessible Cloudflare accounts
Shows all zones (domains) for each account
Displays A records and their corresponding IPs for each zone
SSL verification disabled for testing environments
Error handling and detailed output

Example Output
CopyAccounts and their zones:
==================================================

Account: Example Account (ID: abc123)
--------------------------------------------------

Domain: example.com
  └─ A Record: example.com → 192.0.2.1 (IP)
  └─ A Record: www.example.com → 192.0.2.2 (IP)
Security Considerations

Always keep your API token private
Consider enabling SSL verification in production environments
Rotate API tokens regularly
Use tokens with minimum required permissions

Contributing
Feel free to submit issues and pull requests.
License
This project is licensed under the MIT License - see the LICENSE file for details
