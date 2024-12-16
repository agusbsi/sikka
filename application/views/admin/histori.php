<style>
    .container {
        max-width: 100%;
        margin: 0 auto;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    h1 {
        color: #2c3e50;
        text-align: center;
        margin-bottom: 20px;
        font-size: 24px;
    }

    .search-container {
        margin-bottom: 20px;
    }

    .search-input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 14px;
    }

    .activity-list {
        list-style-type: none;
        padding: 0;
    }

    .activity-item {
        background-color: #f8f9fa;
        border-left: 3px solid #3498db;
        margin-bottom: 10px;
        padding: 10px;
        border-radius: 4px;
        font-size: 14px;
    }

    .activity-name {
        font-weight: bold;
        color: #2c3e50;
    }

    .activity-description {
        margin: 3px 0;
        color: #34495e;
    }

    .activity-date {
        font-size: 0.8em;
        color: #7f8c8d;
    }
</style>
<div class="container">
    <h1>Activity Log</h1>
    <div class="search-container">
        <input type="search" id="search-input" class="search-input" placeholder="Search activities...">
    </div>
    <ul class="activity-list" id="activity-list">
        <?php if (empty($list)) { ?>
            <li style="color:red">- Tidak ada aktivitas -</li>
        <?php } else { ?>
            <?php foreach ($list as $l): ?>
                <li class="activity-item">
                    <div class="activity-name"><?= $l->user ?></div>
                    <div class="activity-description"><?= $l->aksi ?></div>
                    <div class="activity-date"><?= date('d M Y H:i:s', strtotime($l->tanggal)) ?></div>
                </li>
            <?php endforeach ?>
        <?php } ?>
    </ul>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    const searchInput = document.getElementById('search-input');
    const activityList = document.getElementById('activity-list');

    searchInput.addEventListener('input', function() {
        const keyword = searchInput.value;

        // Jangan lakukan pencarian jika kurang dari 3 karakter
        if (keyword.length < 3) {
            activityList.innerHTML = '<li style="color:red">- Masukkan minimal 3 huruf untuk pencarian -</li>';
            return;
        }

        // Kirim permintaan AJAX
        fetch(`<?= base_url('admin/Log/search') ?>?keyword=${keyword}`)
            .then(response => response.json())
            .then(data => {
                // Kosongkan daftar aktivitas
                activityList.innerHTML = '';

                if (data.length === 0) {
                    activityList.innerHTML = '<li style="color:red">- Tidak ada aktivitas yang ditemukan -</li>';
                } else {
                    // Tampilkan hasil pencarian
                    data.forEach(item => {
                        const listItem = document.createElement('li');
                        listItem.className = 'activity-item';
                        listItem.innerHTML = `
                            <div class="activity-name">${item.user}</div>
                            <div class="activity-description">${item.aksi}</div>
                            <div class="activity-date">${new Date(item.tanggal).toLocaleString()}</div>
                        `;
                        activityList.appendChild(listItem);
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
</script>