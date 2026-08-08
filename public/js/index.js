document.addEventListener('DOMContentLoaded', () => {
  const tags = [
    "Design", "Technology", "Travel", "Food", "Lifestyle",
    "Productivity", "Wellness", "Culture", "Startups", "Photography"
  ];

  const marqueeTrack = document.getElementById('marqueeTrack');
  if (marqueeTrack) {
    const doubleTags = [...tags, ...tags];
    marqueeTrack.innerHTML = doubleTags.map(tag => `
      <span class="flex items-center gap-2 whitespace-nowrap rounded-full border border-mint bg-bg px-5 py-2 text-sm font-medium text-ink/80">
        <span class="h-1.5 w-1.5 rounded-full bg-brand"></span>${tag}
      </span>
    `).join('');
  }
});
