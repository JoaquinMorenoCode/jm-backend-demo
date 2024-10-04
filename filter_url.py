import re

def filter_urls(file):
    url_regex = re.compile(r".*shop.*\.html$")

    uniqueURLs = set()

    with open(file, 'r') as f:
        for line in f:
            url = line.strip()
            if url_regex.match(url):
                uniqueURLs.add(url)

    total_urls = len(uniqueURLs)
    return uniqueURLs, total_urls

file = "demo_file.txt"  # Modifica el nombre del archivo de ser necesario
urls, total = filter_urls(file)
print(f"Nro URLs validas: {total}")
print("URLs encontradas:")
for url in urls:
    print(url)
