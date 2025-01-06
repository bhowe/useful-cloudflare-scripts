Verify token permissions:
bashCopycurl -k -X GET "https://api.cloudflare.com/client/v4/user/tokens/verify" \
     -H "Authorization: Bearer YOUR_TOKEN" \
     -H "Content-Type: application/json"
     
List all accounts:
bashCopycurl -k -X GET "https://api.cloudflare.com/client/v4/accounts" \
     -H "Authorization: Bearer YOUR_TOKEN" \
     -H "Content-Type: application/json"
     
List all zones (domains):
bashCopycurl -k -X GET "https://api.cloudflare.com/client/v4/zones" \
     -H "Authorization: Bearer YOUR_TOKEN" \
     -H "Content-Type: application/json"
     
List DNS records for a specific zone:
bashCopycurl -k -X GET "https://api.cloudflare.com/client/v4/zones/ZONE_ID/dns_records" \
     -H "Authorization: Bearer YOUR_TOKEN" \
     -H "Content-Type: application/json"
     
Get account details:
bashCopycurl -k -X GET "https://api.cloudflare.com/client/v4/accounts/ACCOUNT_ID" \
     -H "Authorization: Bearer YOUR_TOKEN" \
     -H "Content-Type: application/json"
