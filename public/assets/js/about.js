// Dynamic Render: About points
    document.getElementById('aboutPoints').innerHTML = aboutPoints.map(p => `
      <div class="flex gap-4">
        <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-mint text-xl">${p.icon}</span>
        <div>
          <h3 class="font-display font-bold text-ink">${p.title}</h3>
          <p class="mt-1 text-sm leading-relaxed text-ink/60">${p.desc}</p>
        </div>
      </div>
    `).join('');