<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container  mt-2 p-2 a1 ">
    <form action="<?= URLROOT ?>/pages/cruis" method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <select class="form-control" name="port">
                        <option value="">selecte le port</option>
                        <?Php foreach ($data['port'] as $row) : ?>
                            <option value="<?php echo $row->id ?>"><?php echo $row->nom ?> <?php echo $row->pays ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <select id="month-input" class="form-control" name="date">
                        <option value=>Select a month</option>
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <select class="form-control" name="navire">
                        <option value="">selecte la Navire </option>
                        <?Php foreach ($data['Navure'] as $row) : ?>
                            <option value="<?php echo $row->id ?>"><?php echo $row->nom ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div><br />
        <div class="row d-flex justify-content-center">
            <div class="col-md-4">
                <input class="btn btn-warning" name="submit" type="submit" value="Go!">
    </form>
    <a href="<?php echo URLROOT; ?>/pages/cruis">
        <input class="btn btn-warning" type="submit" value="back">
    </a>
</div>
</div>
</div>
</div>
<style>
    .a1 {
        background-color: white;
        box-shadow: 13px 14px 0px #1b83b5;
        border-radius: 16px;
        border: solid 1px;
    }
</style>
<div class="container">

    <main style="position: relative;">
        <div class="row row-cols-1 row-cols-md-3 g-4 p-3 mt-2 text-center " id="paginated-list" data-current-page="1" aria-live="polite">
            <?php foreach ($data['croisier'] as $c) : ?>
                <div class="col-md-4 cruiseContainer">
                    <div class="card">
                        <img src="../img/<?= $c->image ?>" style=" aspect-ratio:3/2;" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-title "><?= $c->name ?></h3>
                            <p class="card-text"><?= $c->prix ?> dh</p>
                            <p class="card-text"><?= $c->date_depart ?> dh</p>
                        </div>
                        <a href="<?= URLROOT ?>/reserve/index/<?= $c->id ?>" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="pagination-container" style="margin-top: 10px; bottom: 0;">

            <div id="pagination-numbers">

            </div>
        </div>
    </main>
</div>
<style>
    .hidden {
        display: none !important;
    }

    main {
        position: relative;
        padding: 1rem 1rem 3rem;
        min-height: calc(100vh - 4rem);
    }

    .pagination-container {
        width: calc(100% - 2rem);
        display: flex;
        align-items: center;
        position: absolute;
        bottom: -10px !important;
        padding: 1rem 0;
        justify-content: center;
    }

    .pagination-number,
    .pagination-button {
        font-size: 1.1rem;
        background-color: transparent;
        border: none;
        margin: 0.25rem 0.25rem;
        cursor: pointer;
        height: 2.5rem;
        width: 2.5rem;
        border-radius: .2rem;
    }

    .pagination-number:hover,
    .pagination-button:not(.disabled):hover {
        background: #fff;
    }

    .pagination-number.active {
        color: #fff;
        background: #0085b6;
    }
</style>
<script>
    const paginationNumbers = document.getElementById("pagination-numbers");
    const paginatedList = document.getElementById("paginated-list");
    const listItems = paginatedList.querySelectorAll(".cruiseContainer");

    const paginationLimit = 3;
    const pageCount = Math.ceil(listItems.length / paginationLimit);
    let currentPage = 1;

    const appendPageNumber = (index) => {
        const pageNumber = document.createElement("button");
        pageNumber.className = "pagination-number";
        pageNumber.innerHTML = index;
        pageNumber.setAttribute("page-index", index);
        pageNumber.setAttribute("aria-label", "Page " + index);

        paginationNumbers.appendChild(pageNumber);
    };

    const getPaginationNumbers = () => {
        for (let i = 1; i <= pageCount; i++) {
            appendPageNumber(i);
        }
    };

    const handleActivePageNumber = () => {
        document.querySelectorAll(".pagination-number").forEach((button) => {
            button.classList.remove("active");
            const pageIndex = Number(button.getAttribute("page-index"));
            if (pageIndex == currentPage) {
                button.classList.add("active");
            }
        });
    };

    const setCurrentPage = (pageNum) => {
        currentPage = pageNum;
        handleActivePageNumber();

        const prevRange = (pageNum - 1) * paginationLimit;
        const currRange = pageNum * paginationLimit;

        listItems.forEach((item, index) => {
            item.classList.add("hidden");
            if (index >= prevRange && index < currRange) {
                item.classList.remove("hidden");
            }
        });
    };

    window.addEventListener("load", () => {
        getPaginationNumbers();
        setCurrentPage(1);

        document.querySelectorAll(".pagination-number").forEach((button) => {
            const pageIndex = Number(button.getAttribute("page-index"));

            if (pageIndex) {
                button.addEventListener("click", () => {
                    setCurrentPage(pageIndex);
                });
            }
        });
    });
</script>
<?php require APPROOT . '/views/inc/footer.php'; ?>