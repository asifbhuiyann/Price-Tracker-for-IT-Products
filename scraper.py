# pip install requests
# pip install beautifulsoup4
import requests
from bs4 import BeautifulSoup
import json


def scrape_data(url):
    headers = {
        'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.3'}
    response = requests.get(url, headers=headers)

    if response.status_code != 200:
        print("Failed to retrieve the webpage.")
        return None

    soup = BeautifulSoup(response.text, 'html.parser')

    items = soup.find_all('div', {'class': 'p-item-inner'})

    data_list = []

    for item in items:
        # Fetch image source link
        img_tag = item.find('div', {'class': 'p-item-img'}).find('img')
        img_src = img_tag.get('src', 'N/A') if img_tag else 'N/A'

        # Fetch item name
        name_tag = item.find('h4', {'class': 'p-item-name'}).find('a')
        item_name = name_tag.text if name_tag else 'N/A'

        # Fetch price
        price_tag = item.find('div', {'class': 'p-item-price'}).find('span')
        price = price_tag.text if price_tag else 'N/A'

        data_list.append({
            'image_src': img_src,
            'item_name': item_name,
            'price': price
        })

    return data_list


if __name__ == "__main__":
    # Replace this with the URL you want to scrape from
    url = "https://www.startech.com.bd/monitor"
    scraped_data = scrape_data(url)

    if scraped_data:
        with open('data collection/scraped_data.json', 'w') as f:
            json.dump(scraped_data, f, indent=4)
        print("Data saved to 'scraped_data.json'")
