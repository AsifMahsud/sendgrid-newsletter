const tabList = document.querySelector('.tab-list');
const tabContent = document.querySelector('.tab-content');

tabList.addEventListener('click', (e) => {
    e.preventDefault();
    if (e.target.tagName === 'A') {
        const targetPane = document.querySelector(e.target.getAttribute('href'));
        const activeTab = document.querySelector('.tab-list li.active');
        const activePane = document.querySelector('.tab-pane.active');
        activeTab.classList.remove('active');
        activePane.classList.remove('active');
        e.target.parentNode.classList.add('active');
        targetPane.classList.add('active');
    }
});
