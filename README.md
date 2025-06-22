# Subscene

A Python tool to download subtitles for movies and TV series automatically.

## Description

Subscene is a utility designed to help users download subtitles for movies and TV shows from the Subscene website or similar subtitle platforms. It automates the process of searching, selecting, and downloading subtitle files, supporting multiple languages and subtitle formats.

## Features

- Search subtitles by movie or series title.
- Download subtitles in various languages.
- Supports subtitle formats like SRT.
- Automates subtitle fetching to save time.
- Can be integrated into media workflows or players.

## Installation

Clone the repository:

```
git clone https://github.com/Tanto123/Subscene.git
cd Subscene
```

Install required Python packages (if any):

```
pip install -r requirements.txt
```

> Note: Add a `requirements.txt` file listing dependencies like `requests`, `beautifulsoup4`, etc., if used.

## Usage

Basic example to download subtitles:

```
from subscene import download_subtitle

# Search and download subtitle for a movie or series
download_subtitle("The Matrix", language="English")
```

Or run a CLI script (if provided):

```
python subscene_downloader.py --title "The Matrix" --language "English"
```

Downloaded subtitles are saved locally in SRT format.

## How It Works

- Connects to Subscene or similar subtitle sites.
- Searches for the requested title.
- Lists available subtitles by language and version.
- Downloads the selected subtitle file automatically.

## Notes

- The original Subscene website may have restrictions or changes; this tool may require updates accordingly.
- Respect copyright and licensing when downloading subtitles.
- This tool is intended for personal use and educational purposes.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

---
