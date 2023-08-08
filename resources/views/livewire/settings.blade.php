<div class="container p-5">
    <h2>Settings</h2>
    <table class="table">
        <thead class="table-light">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Value</th>
            </tr>
        </thead>
        <tbody>
            <tr class="table-light">
                <th>Polling Interval</th>
                <td>
                    <select class="form-control" wire:model.live="polling_interval">
                        <option value="1">Every 1 Minute</option>
                        <option value="5">Every 5 Minutes</option>
                        <option value="10">Every 10 Minutes</option>
                        <option value="15">Every 15 Minutes</option>
                        <option value="30">Every 30 Minutes</option>
                        <option value="60">Every 1 Hour</option>
                    </select>
                </td>
            </tr>
        </tbody>
    </table>
</div>
