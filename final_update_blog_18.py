import requests
import os

images = {
    'featured': r'C:\Users\Ahmad\.gemini\antigravity\brain\9349fe3b-e0ab-45f1-abd3-2d47b93d32b8\blog_featured_image_allintitle_16_9_1769532516921.png',
    'formula': r'C:\Users\Ahmad\.gemini\antigravity\brain\9349fe3b-e0ab-45f1-abd3-2d47b93d32b8\allintitle_kgr_formula_1769532220463.png',
    'preview': r'C:\Users\Ahmad\.gemini\antigravity\brain\9349fe3b-e0ab-45f1-abd3-2d47b93d32b8\allintitle_google_search_preview_mockup_1769532238106.png',
    'growth': r'C:\Users\Ahmad\.gemini\antigravity\brain\9349fe3b-e0ab-45f1-abd3-2d47b93d32b8\seo_growth_success_bar_chart_1769532256260.png'
}

BASE_URL = 'https://optimizo.io'

urls = {}
for key, path in images.items():
    if not os.path.exists(path):
        print(f"File not found: {path}")
        continue
    with open(path, 'rb') as f:
        # Try both /api/media and /api/v1/media if needed, but stick to what we saw in routes
        r = requests.post(f'{BASE_URL}/api/media', files={'file': f})
        if r.status_code == 201:
            urls[key] = r.json()['data']['url']
            print(f'Uploaded {key}: {urls[key]}')
        else:
            print(f'Failed to upload {key} (Status {r.status_code}): {r.text[:200]}')

if len(urls) == 4:
    content = f'''<h2>The "Keyword Difficulty" Trap</h2>
<p>Most SEO tools give you a "Difficulty" score based on backlinks. But for new or low-authority sites, these scores are often misleading. You target a "Low Difficulty" keyword, write great content, and... nothing happens. Why? Because you're still competing with established giants who happen to have the keyword in their title.</p>

<h2>The Solution: The Keyword Golden Ratio (KGR)</h2>
<p>The Keyword Golden Ratio is a data-driven way to find keywords that are underserved on the internet. If you find a KGR keyword and publish a post on it, you can often rank in the top 50 (or even top 10) within days.</p>

<img src="{urls['formula']}" alt="KGR Formula" style="width:100%; border-radius: 10px; margin: 20px 0;">

<h2>Step-by-Step Guide to the Allintitle Strategy</h2>
<ol>
<li><strong>Find a Long-Tail Keyword</strong>: Use a tool like <a href="https://optimizo.io">Optimizo</a> to find keywords with &lt; 250 monthly searches.</li>
<li><strong>Run an Allintitle Search</strong>: Go to Google and type <code>allintitle: "your keyword"</code>.</li>
<li><strong>Check the Competition</strong>:</li>
</ol>
<img src="{urls['preview']}" alt="Google Search Preview" style="width:100%; border-radius: 10px; margin: 20px 0;">
<ol start="4">
<li><strong>Calculate KGR</strong>: Divide the number of results by the search volume.
<ul>
<li><strong>&lt; 0.25</strong>: The Golden Zone (Rank fast).</li>
<li><strong>0.25 - 1.00</strong>: Likely to rank with some effort.</li>
<li><strong>&gt; 1.00</strong>: Too competitive for new sites.</li>
</ul>
</li>
</ol>

<h2>Why This Works (Problem Solved)</h2>
<p>By targeting these "Golden" keywords, you aren't fighting massive domains for the same space. You are providing a specific answer to a specific search query that Google hasn't found a perfect title-match for yet.</p>

<img src="{urls['growth']}" alt="Success Chart" style="width:100%; border-radius: 10px; margin: 20px 0;">'''

    data = {
        'title': 'Stop Guessing: How to Find "Golden" Keywords Google Wants You to Rank For',
        'content': content,
        'featured_image': urls['featured'],
        'status': 'published'
    }
    
    r = requests.put(f'{BASE_URL}/api/blogs/18', json=data)
    if r.status_code == 200:
        print('Blog post updated successfully!')
    else:
        print(f'Failed to update blog post (Status {r.status_code}): {r.text[:200]}')
else:
    print(f"Only {len(urls)}/4 images uploaded. Checking if some survived.")
    # Attempting update even if partial? No, better get all.
