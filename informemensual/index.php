<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Data</title>
    <style>
        .tabs {
            overflow: hidden;
            border-bottom: 1px solid #ddd;
        }
        .tabs button {
            background-color: #f1f1f1;
            border: none;
            outline: none;
            padding: 14px 16px;
            cursor: pointer;
        }
        .tabs button.active {
            background-color: #ddd;
        }
        .tab-content {
            display: none;
            padding: 20px;
        }
    </style>
</head>
<body>

<div id="tabs-container">
    <!-- Tabs will be generated here -->
</div>

<div id="content-container">
    <!-- Content will be generated here -->
</div>

<script>
    const sellers = ['Melisa Valdez'];
    const months = [
        '2024-01', '2024-02', '2024-03', '2024-04', '2024-05', '2024-06',
        '2024-07', '2024-08', '2024-09', '2024-10', '2024-11', '2024-12'
    ];

    function generateTabs() {
        const tabsContainer = document.getElementById('tabs-container');
        const contentContainer = document.getElementById('content-container');

        sellers.forEach(seller => {
            const sellerTabs = document.createElement('div');
            sellerTabs.className = 'tabs';

            const sellerContent = document.createElement('div');
            sellerContent.className = 'tab-content';

            months.forEach((month, index) => {
                const tabButton = document.createElement('button');
                tabButton.textContent = `Month ${index + 1}`;
                tabButton.onclick = () => openTab(index, seller, month);

                sellerTabs.appendChild(tabButton);

                const tabContent = document.createElement('div');
                tabContent.id = `content-${index}-${seller}`;
                tabContent.style.display = 'none';
                sellerContent.appendChild(tabContent);
            });

            tabsContainer.appendChild(sellerTabs);
            contentContainer.appendChild(sellerContent);
        });

        if (sellers.length > 0) {
            openTab(0, sellers[0], months[0]);
        }
    }

    function openTab(monthIndex, seller, month) {
        const allContents = document.querySelectorAll('.tab-content > div');
        allContents.forEach(content => content.style.display = 'none');

        const selectedContent = document.getElementById(`content-${monthIndex}-${seller}`);
        if (selectedContent) {
            selectedContent.style.display = 'block';
        }

        const allButtons = document.querySelectorAll('.tabs button');
        allButtons.forEach(button => button.classList.remove('active'));

        const activeButton = document.querySelector(`.tabs button:nth-of-type(${monthIndex + 1})`);
        if (activeButton) {
            activeButton.classList.add('active');
        }

        loadData(seller, month);
    }

    function loadData(seller, month) {
        fetch(`./data.php?seller=${encodeURIComponent(seller)}&month=${encodeURIComponent(month)}`)
            .then(response => response.json())
            .then(data => {
                const contentElement = document.getElementById(`content-${months.indexOf(month)}-${seller}`);
                if (contentElement) {
                    let html = '<table><tr><th>State</th><th>Count</th></tr>';
                    data.forEach(row => {
                        html += `<tr><td>${row.estadoventa}</td><td>${row.cantidad}</td></tr>`;
                    });
                    html += '</table>';
                    contentElement.innerHTML = html;
                }
            })
            .catch(error => console.error('Fetch error:', error));
    }

    generateTabs();
</script>

</body>
</html>
